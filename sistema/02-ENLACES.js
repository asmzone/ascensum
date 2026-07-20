function inicializarEnlaces() {

    // =====================================================
    // BOTONES COMPRAR NODO
    // =====================================================

    document.querySelectorAll(".asm-link-comprar").forEach(function (boton) {
        boton.href = WHATSAPP_COMPRAR;
    });

    document.querySelectorAll(".asm-link-whatsapp").forEach(function (boton) {
        boton.href = CONTACTO_PRINCIPAL;
    });

    // =====================================================
    // TELEGRAM
    // =====================================================

    document.querySelectorAll(".asm-link-telegram").forEach(function (boton) {
        boton.href = TELEGRAM;
    });

    // =====================================================
    // BOTONES NECESITO AYUDA
    // =====================================================

    document.querySelectorAll(".asm-link-ayuda").forEach(function (boton) {
        boton.href = WHATSAPP_AYUDA;
    });

    // =====================================================
    // LINK DE REFERIDO
    // =====================================================

    const refLink = document.getElementById("refLink");

    if (refLink) {
        refLink.innerText = LINK_REFERIDO;
    }

    // =====================================================
    // WALLET DEL SPONSOR
    // =====================================================

    const walletSponsor = document.getElementById("walletSponsor");

    if (walletSponsor) {
        walletSponsor.innerText = WALLET;
    }

    console.log("✅ Enlaces inicializados.");
}


