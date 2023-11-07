import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import { getDades } from './modules.js'

createApp({
    data() {
        return {
            comanda: {
                namecli: "",
                direccio: "",
                ciutat: "",
                codi_postal: "",
                pais: "",
            },
            carrEstat: false,
            searchTerm: "",
            visible: false,
            amagar: false,
            totalCarret: 0,
            carret: [],
            productes: [],
            main: false,
            landing: true,
            cart: false,
            login: false,
            comandes: false,
            tramitarComandes: false,
            prod: false,
            prodAct: -1
        }
    },

    methods: {
        setMostrar(claseAct, claseGo) {
            console.log("hola");
            switch (claseAct) {
                case "all":
                    this.tramitarComandes = false;
                    this.comandes = false;
                    this.login = false;
                    this.cart = false;
                    this.landing = false;
                    this.main = false;
                    this.prod = false;
                    break;
                case "main":
                    this.main = false;
                    break;
                case "landing":
                    this.landing = false;
                    break;
                case "cart":
                    this.cart = false;
                    break;
                case "login":
                    this.login = false;
                    break;
                case "comandes":
                    this.comandes = false;
                    break;
                case "tramitarComandes":
                    this.tramitarComandes = false;
                    break;
                case "prod":
                    this.prod = false;
                    break;
                default:
                    break;
            }


            switch (claseGo) {
                case "main":
                    this.main = true;
                    break;
                case "landing":
                    this.landing = true;
                    break;
                case "cart":
                    this.cart = true;
                    break;
                case "login":
                    this.login = true;
                    break;
                case "comandes":
                    this.comandes = true;
                    break;
                case "tramitarComandes":
                    this.tramitarComandes = true;
                    break;
                case "prod":
                    this.prod = true;
                    break;
                default:
                    break;
            }
        },
        sumarIn(id) {
            if (this.productes[id].stock > this.productes[id].carro) {
                if (this.productes[id].carro < 1) {
                    this.carret.push(this.productes[id]);
                }
                this.productes[id].carro++;
                this.canviCarrEstat(1);
            }
        },
        mostrarData() {
            const fechaActual = new Date();

            const día = fechaActual.getDate().toString().padStart(2, '0');
            const mes = (fechaActual.getMonth() + 1).toString().padStart(2, '0');
            const año = fechaActual.getFullYear();

            const fechaFormateada = `${día}/${mes}/${año}`;
            return fechaFormateada;
        },
        trobarProdID(id) {
            const carretIndex = this.productes.findIndex(producto => producto.id === id);
            console.log(carretIndex);
            this.prodAct = carretIndex;
        },
        trobarProdCart(id) {
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
                    this.carret.splice(this.trobarProdCart(id), 1);
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
        enviarComanda() {
            let dades=JSON.stringify({'comanda': this.comanda, 'carret' : this.carret});
            console.log(dades);
            fetch('http://dawtr1g6.daw.inspedralbes.cat/public/api/getPedidos', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: dades,
            })
                .then(response => {
                    if (response.ok) {
                        alert('Comanda enviada exitosamente');
                        this.cancelar();
                    } else {
                        alert('Error al enviar la comanda');
                    }
                });
        },
        cancelar() {
            this.comanda = {
                namecli: '',
                direccio: '',
                ciutat: '',
                codi_postal: '',
                pais: '',
            };
        }
    },
    watch: {
        searchTerm: "search"
    },
    created() {
        getDades().then(data => {
            this.productes = data;
            console.log(this.productes);
            this.search();
        });
    },
    computed: {
        productesMesVenuts() {
            const filteredProductes = this.productes.filter(product => product.stock <= 10);
            return filteredProductes.slice(0, 12);
        }
    }
}).mount('#app')