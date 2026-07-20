/******************************************************************
 * CONFIG.js
 ******************************************************************/

let ASCENSUM = {};

 let WHATSAPP_COMPRAR = "";
 let WHATSAPP_AYUDA = "";
 let CONTACTO_PRINCIPAL = "";

 let TELEGRAM = "";

 let WALLET = "";

 let LINK_REFERIDO = "";

async function cargarConfiguracion() {

    try {


        console.log("Página:", location.href);
        console.log("Config:", new URL("config.json", location.href).href);

        console.log("CARLOS 14 JULIO 2026 - PRUEBA 999");
        const respuesta = await fetch("config.json");


        if (!respuesta.ok) {
            throw new Error("No se pudo cargar config.json");
        }

        ASCENSUM = await respuesta.json();

        console.log("JSON LEÍDO");
        console.log(ASCENSUM);



        // ===========================
        // WHATSAPP
        // ===========================

        console.log("Llegué hasta acá");

        WHATSAPP_COMPRAR =
            "https://wa.link/" + ASCENSUM.whatsapp.comprar;

        WHATSAPP_AYUDA =
            "https://wa.link/" + ASCENSUM.whatsapp.ayuda;

        CONTACTO_PRINCIPAL =
            "https://wa.link/" + ASCENSUM.whatsapp.contacto;

        // ===========================
        // TELEGRAM
        // ===========================

        TELEGRAM =
            "https://t.me/" + ASCENSUM.telegram.contacto;

        // ===========================
        // WALLET
        // ===========================

        WALLET =
            ASCENSUM.blockchain.wallet;

        // ===========================
        // LINK REFERIDO
        // ===========================

        LINK_REFERIDO =
            "https://dao.ascensum.io/buy?ref=" +
            WALLET +
            "&index=0";

        console.log("✅ Configuración cargada.");

        inicializarEnlaces();

    } catch (error) {

        console.error(error);

    }

}


        cargarConfiguracion();

console.log("CONFIG.js cargado");


