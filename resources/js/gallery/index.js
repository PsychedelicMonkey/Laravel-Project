import imagesLoaded from "imagesloaded";
import Masonry from "masonry-layout";

import lightbox from "./lightbox";

const gallery = document.querySelector(".gallery");
let msnry;

imagesLoaded(gallery, () => {
    msnry = new Masonry(gallery, {
        itemSelector: ".gallery-item",
        columnWidth: ".gallery-sizer",
        percentPosition: true,
        gutter: 22,
    });
});
