import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import { getDades } from './modules.js'

createApp({
    data() {
        return {
            token: "",
            tokenT: false,
            comanda: {
                namecli: "",
                direccio: "",
                ciutat: "",
                codi_postal: "",
                pais: "",
            },
            loginA: {
                email: "",
                password: "",
            },
            registreA: {
                name: "",
                email: "",
                password: "",
            },
            carrEstat: false,
            searchTerm: "",
            visible: false,
            amagar: false,
            totalCarret: 0,
            carret: [],
            productes: [],
            comandesA: [],
            main: false,
            landing: true,
            cart: false,
            logi: false,
            regis: false,
            comandes: false,
            tramitarComandes: false,
            prod: false,
            comanProds: false,
            prodAct: -1,
            comandaAct: -1,
            categorias: ['tots', 'berlina', 'esportiu', 'suv'],
            selectedCategoria: 'tots',
            orden: "null"
        }
    },

    methods: {
        setMostrar(claseAct, claseGo) {
            console.log("hola");
            switch (claseAct) {
                case "all":
                    this.tramitarComandes = false;
                    this.comandes = false;
                    this.logi = false;
                    this.cart = false;
                    this.landing = false;
                    this.main = false;
                    this.prod = false;
                    this.regis = false;
                    this.comanProds = false;
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
                case "logi":
                    this.logi = true;
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
                case "regis":
                    this.regis = true;
                    break;
                case "comanProds":
                    this.comanProds = true;
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
            let dades = JSON.stringify({ 'comanda': this.comanda, 'carret': this.carret, 'token': this.token });
            console.log(dades);
            this.carret = [];
            this.productes.forEach(producte => {
                producte.carro = 0;
            });
            this.totalCarret = 0;
            this.visible = false;
            fetch('http://dawtr1g6.daw.inspedralbes.cat/back/public/api/getPedidos', {
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
        },
        login() {
            let dades = JSON.stringify(this.loginA);
            console.log(dades);
            fetch('http://dawtr1g6.daw.inspedralbes.cat/back/public/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: dades,
            })
                .then(response => {
                    if (response.ok) {
                        this.setMostrar("all", "landing");
                    } else {
                        alert('Email o contrasenya incorrecte');
                        this.loginA.password = {
                            password: '',
                        };
                    }
                    return response.json();
                })
                .then((data) => {
                    console.log(data.token);
                    this.token = data.token;
                    this.tokenT = true;
                });
        },
        registre() {
            let dades = JSON.stringify(this.registreA);
            console.log(dades);
            fetch('http://dawtr1g6.daw.inspedralbes.cat/back/public/api/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: dades,
            })
                .then(response => {
                    if (response.ok) {
                        this.setMostrar("all", "landing");
                    } else {
                        alert('Email o contrasenya incorrecte');
                        this.registreA = {
                            password: '',
                        };
                    }
                    return response.json();
                })
                .then((data) => {
                    console.log(data.token);
                    this.token = data.token;
                    this.tokenT = true;
                });
        },
        logout() {
            this.token = '';
            this.tokenT = false;
            this.comandesA = [];

            // fetch('http://dawtr1g6.daw.inspedralbes.cat/back/public/api/logout', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //     },
            // })
            //     .then(response => {
            //         if (response.ok) {
            //         } else {
            //             alert('Error');
            //         }
            //     });
        },
        getComandes() {
            let dades = JSON.stringify({ 'token': this.token });
            fetch('http://dawtr1g6.daw.inspedralbes.cat/back/public/api/listaPedidosUser', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: dades
            })
                .then(response => {
                    return response.json();
                })
                .then(data => {
                    data.pedidosUser.forEach(pedido => {
                        pedido.liniaPedidos.forEach(item => {
                            item.created_at = this.formatearFecha(item.created_at);
                            item.updated_at = this.formatearFecha(item.updated_at);
                        });
                    });
                    this.comandesA = data;
                });
        },
        formatearFecha(fecha) {
            const fechaObj = new Date(fecha);
            const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit', timeZoneName: 'short' };
            return fechaObj.toLocaleDateString('es-ES', options);
        },
        checkToken() {
            if (this.tokenT) {
                this.getComandes();
            }
        },
        setComandaAct(i) {
            console.log('Índice recibido:', i);
            this.comandaAct = i;
        }
    },
    watch: {
        searchTerm: "search",
        token: function (newToken) {
            this.tokenT = Boolean(newToken);
        }
    },
    created() {
        getDades().then(data => {
            this.productes = data;
            console.log(this.productes);
            this.search();
        });


        setInterval(this.checkToken, 5000);

    },
    computed: {
        productesMesVenuts() {
            const filteredProductes = this.productes.filter(product => product.stock <= 10);
            return filteredProductes.slice(0, 12);
        }
    }
}).mount('#app')