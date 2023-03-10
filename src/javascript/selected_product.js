/* get selected product */
import selectedProductArray from "../php/selectedProduct.json" assert { type: "json" };

const { createApp } = window.Vue;
const component = {
    data(){
        return{
            selectedProduct : selectedProductArray,
        }
    },
    mounted() {
        console.log(this.selectedProduct)
    },
}
/* mount on main */
window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#info")
})