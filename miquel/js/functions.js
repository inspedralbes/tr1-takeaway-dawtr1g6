import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import { getDades } from './modules.js'

createApp({

    data() {
        return {
            searchTerm: "",
            visible: false,
            amagar: false,
            totalCarret: 0,
            carret: [],
            productes: []
        }
    },

    methods: {

        trobarProd(id) {
            const carretIndex = this.carret.findIndex(item => item.nom === this.productes[id].nom);
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
            if (!this.visible && !this.amagar) {
                this.setVisible(true);
            }
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
            if (this.carret.length < 1) {
                this.visible = false;
            }
        },
        calTotal() {
            this.totalCarret = 0;
            this.carret.forEach(element => {
                this.totalCarret += element.precio * element.carro;
            });
        },
        toggle() {
            console.log(this.visible);
            if (this.visible && this.carret.length!=0) {
                this.amagar = true;
            }
            if (this.visible) {
                this.visible = false;
            } else if (!this.visible) {
                this.visible = true;
            }
            console.log(this.visible);
        },
        setVisible(cond) {
            this.visible = cond;
        },
        search() {
            if (this.searchTerm.trim() !== "") {
                this.productes = this.productes.filter((product) => {
                    return product.nom.toLowerCase().includes(this.searchTerm.toLowerCase());
                });
            }
        }
    },
    created() {
        getDades().then(data => {
            this.productes = data
        });
    }
}).mount('#main')