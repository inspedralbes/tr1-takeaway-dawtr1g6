export async function getDades () {
    const response = await fetch('./js/json/dades.json');
    const dades = await response.json();
    return dades.productos;
}