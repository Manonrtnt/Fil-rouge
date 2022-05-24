const svg = new Walkway({
    selector: '#svg',
    duration: 10000,
    easing: 'linear',
});


svg.draw(after);

// function after(){
//     console.log('Youpi !');
// }

function fillPath(classname, color){
    const paths = document.querySelectorAll(`#svg-castle .${classname}`);
    for(path of paths){
        path.style.fill = `${color}`;
    }
}
