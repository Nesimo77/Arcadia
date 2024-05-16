const blades = document.querySelectorAll('.blade');

let rotation = 0;

setInterval(() => {
    rotation += 1;
    blades.forEach((blade, index) => {
        blade.style.transform = `rotate(${rotation + (index * 90)}deg)`;
    });
}, 50);
