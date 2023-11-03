export async function getDades() {
    const response = await fetch('./js/json/dades.json');
    // ./js/json/dades.json
    // http://autoplanet.daw.inspedralbes.cat/1-dawtr1g6/public/api/getJsonProductos
    const dades = await response.json();
    dades.productos.forEach(productos => {
        productos.carro = 0;
    });
    return dades.productos;
}