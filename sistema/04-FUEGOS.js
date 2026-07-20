/*
============================================================
04-FUEGOS.js
Sistema de Fuegos Artificiales
Proyecto Ascensum

Versión: 1.0.0
Autor: Carlos Etcheverry
============================================================
*/

(() => {

    "use strict";

    console.log("🔥 Módulo de fuegos artificiales cargado.");

    // ============================================================
    // Inserta automáticamente los estilos CSS del módulo
    // ============================================================

    const estilos = document.createElement("style");

    estilos.textContent = `
        .firework-star {
            position: fixed;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            pointer-events: none;
            opacity: 0.9;
            mix-blend-mode: screen;
            box-shadow: 0 0 15px white, 0 0 30px white;
            z-index: 1000;
        }
    `;

    document.head.appendChild(estilos);

})();