export async function getDades() {
    const response = await fetch('http://dawtr1g6.daw.inspedralbes.cat/back/public/api/getJsonProductos');
    // ./js/json/dades.json
    // http://dawtr1g6.daw.inspedralbes.cat/public/api/getJsonProductos
    const dades = await response.json();
    dades.productos.forEach(productos => {
        productos.carro = 0;
    });
    return dades.productos;
}