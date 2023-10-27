import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import { getDades } from './modules.js'

createApp({
    data() {
        return {
            carrEstat: false,
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
            const carretIndex = this.carret.findIndex(item => item.name === this.productes[id].name);
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
            } else if (!this.visible && this.amagar) {
                this.canviCarrEstat(1);
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
                this.amagar = false;
            }
        },
        calTotal() {
            this.totalCarret = 0;
            this.carret.forEach(element => {
                this.totalCarret += element.price * element.carro;
            });
        },
        toggle() {
            console.log(this.visible);
            if (this.visible && this.carret.length != 0) {
                this.amagar = true;
            }
            if (this.visible) {
                this.visible = false;
            } else if (!this.visible) {
                this.visible = true;
                this.carrEstat = false;
            }
            console.log(this.visible);
        },
        setVisible(cond) {
            this.visible = cond;
        },
        search() {
            if (this.searchTerm.trim() !== "") {
                this.productes = this.productes.filter((product) => {
                    return product.name.toLowerCase().includes(this.searchTerm.toLowerCase());
                });
            }
        },
        canviCarrEstat(con) {
            if (con == 1) {
                this.carrEstat = true;
            } else {
                this.carrEstat = false;
            }
        },
        onSearchInput() {
            if (this.searchTimer) {
                clearTimeout(this.searchTimer);
            }

            this.searchTimer = setTimeout(this.search, 500);
        },
        search() {
            if (this.searchTerm.trim() !== "") {
                this.productes = this.productes.filter((product) => {
                    return product.name.toLowerCase().includes(this.searchTerm.toLowerCase());
                });
            } else {
                // Cuando el campo de búsqueda está vacío, muestra todos los productes nuevamente
                getDades().then(data => {
                    this.productes = data;
                });
            }
        },
    },
    watch: {
        searchTerm: "search"
    },
    created() {
        getDades().then(data => {
            this.productes = data;
            this.search();
        });
    }
}).mount('#main')