import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import { getDades } from './modules.js'

createApp({

    data() {
        return {
            totalCarret: 0,
            carret: [],
            productes: []
        }
    },

    methods: {

        trobarProd(id) {
            const carretIndex = this.carret.findIndex(item => item.nombre === this.productes[id].nombre);
            return carretIndex;
        },
        sumar(id) {
            if (this.productes[id].stock > this.productes[id].carro) {
                if (this.productes[id].carro < 1) {
                    this.carret.push(this.productes[id]);
                }
                this.productes[id].carro++;
            }
            console.log(this.carret);
            this.calTotal();
        },
        restar(id) {
            if (this.productes[id].carro > 0) {
                this.productes[id].carro--;
                if (this.productes[id].carro === 0) {
                    this.carret.splice(this.trobarProd(id), 1);
                }
            }
            console.log(this.carret);
            this.calTotal();
        },
        sumarC(id) {
            if (this.carret[id].stock > this.carret[id].carro) {
                this.carret[id].carro++;
            }
            console.log(this.carret);
            this.calTotal();
        },
        restarC(id) {
            if (this.carret[id].carro > 0) {
                this.carret[id].carro--;
                if (this.carret[id].carro == 0) {
                    this.carret.splice(id, 1);
                }
            }
            console.log(this.carret);
            this.calTotal();
        },
        calTotal() {

            this.carret.forEach(element => {
                this.totalCarret += element.precio * element.carro;
            });
        }
    },
    created() {
        getDades().then(data => {
            this.productes = data
        });
    }
}).mount('#cont')