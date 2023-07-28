window.addEventListener("load", (event) => {
    //aplicando mascara em um elemento
    element = document.querySelector('#cpf');
    if (element) {
        maskOptions = { mask: '000.000.000-00' };
        IMask(element, maskOptions);
    }

    //aplicando mascaras em varios elementos
    elements = document.querySelectorAll('.date');
    maskOptions = { mask: '00/00/0000' };
    for (var i = 0; i < elements.length; i++) {
        IMask(elements[i], maskOptions);
    }
});