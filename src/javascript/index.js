const { createApp } = window.Vue;

const component = {
    data(){
        return{
            all : null,
            hoodies :null,
            accessories : null,
            t_shirts:null,
            upcoming :null,

        }
    },
    mounted() {
        //get all merch
          axios
            .get('public/animemerch')
            .then( response => (this.all = response.data))
            
            //get hoodie merch
        axios
          .get('public/animemerch/hoodies')
          .then(response =>(this.hoodies = response.data))

            //get t-shirt merch
        axios
          .get('public/animemerch/t-shirts')
          .then(response =>(this.t_shirts = response.data))

            //get accessories merch
        axios
          .get('public/animemerch/accessories')
          .then(response =>(this.accessories = response.data))

            //get upcoming merch
        axios
          .get('public/animemerch/upcoming')
          .then(response =>(this.upcoming = response.data))
        },    
}

/* mount on main */
window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#main")
})
