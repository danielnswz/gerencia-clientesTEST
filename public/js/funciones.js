
//CONVIERTE FECHA DE BD AL FORMATO NORMAL
function convertirFecha(fecha,delimitador) {

    fechaArray = fecha.split(delimitador);
    return fechaArray[2] + delimitador + fechaArray[1] + delimitador + fechaArray[0];


}

//CONVIERTE HORA DEL FORMATO 24 HRS AL 12 HRS
function convertirHora(time) {
    
    time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

    if (time.length > 1) { 
        time = time.slice(1);  
        time[5] = +time[0] < 12 ? ' AM' : ' PM';  
        time[0] = +time[0] % 12 || 12;  
    }
    return time.join('');  
}
