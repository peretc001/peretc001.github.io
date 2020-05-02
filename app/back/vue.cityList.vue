<script>
    let cityList = new Vue({
    el: '.cityList',
    data: {
      search: '',
      cityList: [
        "Москва", 
        "Абрамцево", 
        "Алабино", 
        "Апрелевка", 
        "Архангельское", 
        "Ашитково", 
        "Байконур", 
        "Бакшеево", 
        "Балашиха", 
        "Барыбино", 
        "Белоомут", 
        "Белые Столбы", 
        "Бородино", 
        "Бронницы", 
      ],
      cities: []
    },
    beforeMount() {
      this.cities = this.cityList
    },
    methods:{
      filterList: function(event){
        if (this.search.length > 0) {
          this.cities = this.cityList.filter(item => {
            return item.toLowerCase().indexOf(this.search.toLowerCase()) > -1
          })
        } else {
          this.cities = this.cityList
        }
      }
    }
  })
  </script>