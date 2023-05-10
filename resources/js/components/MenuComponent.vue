<template>
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
        <span class="fs-4 align-self-center">Меню</span>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
           <span class="fs-4 text-decoration-none">Выбранный адрес</span>
           <template v-if="location">
               <div class="container bg-info mt-3">
                   <div>{{ location.name }}</div>
                   <div>{{ location.description }}</div>
                   <div>{{ location.point }}</div>
               </div>
               <button @click.prevent="saveAdress" class="btn btn-outline-primary mt-3">Сохранить</button>
           </template>
          </li>
          <li class="nav-item mt-5">
            <div class="d-flex justify-content-between">
                <span class="fs-4">Добавленные адреса</span>
                <button v-if="selectIds" @click="deleteAdresses" class="btn btn-outline-danger fs-6">Удалить адреса</button>
            </div>
           <template v-if="adresses" v-for="adress in adresses">
               <div :id="`select_${adress.point}`" class="container bg-success p-2 text-dark bg-opacity-25 mt-3">
                   <div>{{ adress.name }}</div>
                   <div>{{ adress.description }}</div>
                   <div>{{ adress.point }}</div>
                   <button :id="`hide_${adress.point}`" @click="hide(adress.point)" class="btn btn-outline-primary fs-6">Скрыть</button>
                   <button :id="`show_${adress.point}`" @click="show(adress.point)" class="btn btn-outline-primary fs-6 d-none">Показать</button>
               </div>
           </template>
          </li>

        </ul>
        <hr>
      </div>
    </template>
    
    
    <script>
    export default {
        name: 'Menu',
    
        data() {
            return {
                location: null,
                adresses:null,
                selectIds: []
            }
        },
    
        mounted() {
            this.getAdresses()
        },


        methods: {

            getAdresses() {
                axios.get('/api/adresses')
                .then(res => {
                    this.adresses = res.data.data
                    this.showAllAdresses()
                })
            },

            saveAdress() {
                axios.post('/api/adresses/', {name:this.location.name, description: this.location.description, point: this.location.point})
                .then(res => this.getAdresses() )
            },

            showAllAdresses() {
                this.adresses.forEach((item) => {
                    this.$parent.$refs.map_component.addPlaceMark(item.point)
                })
            },

            hide(point) {
                this.$parent.$refs.map_component.hideMark(point)
                let $show = document.getElementById(`show_${point}`)
                let $hide = document.getElementById(`hide_${point}`)
                $show.className = 'btn btn-outline-primary fs-6'
                $hide.className = 'btn btn-outline-primary fs-6 d-none'
            },

            show(point) {
                this.$parent.$refs.map_component.addPlaceMark(point)
                let $show = document.getElementById(`show_${point}`)
                let $hide = document.getElementById(`hide_${point}`)
                $show.className = 'btn btn-outline-primary fs-6 d-none'
                $hide.className = 'btn btn-outline-primary fs-6'
            },

            select(point) {
                console.log('111')

                point = JSON.parse(JSON.stringify(point))
                let coord = [point[1], point[0]].join(' ')
                this.adresses.forEach(item => {

                     if (item.point === coord) {
                        if (this.selectIds.includes(item.id)) {
                            this.selectIds = this.selectIds.filter(id => id !== item.id)
                        }
                        else {
                            this.selectIds.push(item.id)
                        }
                        this.selectionView(coord)
                        
                    }
                })
            },

            selectionView(coord) {
                let $select = document.getElementById(`select_${coord}`)
                if ($select.className === 'container bg-success p-2 text-dark bg-opacity-50 mt-3') {
                    $select.className = 'container bg-success p-2 text-dark bg-opacity-25 mt-3'
                } else {
                    $select.className = 'container bg-success p-2 text-dark bg-opacity-50 mt-3'
                }
            },

            unselectView() {
                this.adresses.forEach(item => {
                    let $select = document.getElementById(`select_${item.point}`)
                    $select.className = 'container bg-success p-2 text-dark bg-opacity-25 mt-3'
                })
            },

            deleteAdresses() {

                this.$parent.$refs.map_component.removeMarks()

                this.selectIds.forEach( id => {
                    axios.delete(`/api/adresses/${id}`)
                    .then(res => console.log(res))
                })


                this.getAdresses()

                this.unselectView()

                
            }

    
    
        }
        
    }
    </script>