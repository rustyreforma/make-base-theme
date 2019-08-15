import ScrollBooster from 'scrollbooster'

let viewport = document.querySelector('.c-latest-videos_video')
let content = viewport.querySelector('.c-latest-videos_video__list')

let sb = new ScrollBooster({
    viewport, // this parameter is required
    content, // scrollable element
    emulateScroll: true,
    mode: 'x', // scroll only in horizontal dimension
    onUpdate: (data) => {
        // your scroll logic goes here
        content.style.transform = `translateX(${-data.position.x}px)`
    },
    onClick: (data, event) => {
        console.log();
        document.querySelector('.item').addEventListener("click", function (event) {
            alert('hey working!')
            event.preventDefault()
        });
        // if (event.target.classList.contains('link')) {
        //     event.preventDefault()
        // }
    }
})  