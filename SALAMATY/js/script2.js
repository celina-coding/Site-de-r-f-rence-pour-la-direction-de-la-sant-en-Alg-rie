function hoverEffect(box) {
    box.classList.add('img-fullscreen');
    const siblings = getSiblings(box);
    siblings.forEach(sibling => {
        sibling.classList.add('behind');
    });
}

function resetEffect(box) {
    box.classList.remove('img-fullscreen');
    const siblings = getSiblings(box);
    siblings.forEach(sibling => {
        sibling.classList.remove('behind');
    });
}

function getSiblings(elem) {
    const siblings = [];
    let sibling = elem.parentNode.firstChild;
    while (sibling) {
        if (sibling.nodeType === 1 && sibling !== elem) {
            siblings.push(sibling);
        }
        sibling = sibling.nextSibling;
    }
    return siblings;
}
