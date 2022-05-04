import imagesLoaded from "imagesloaded";
import Masonry from "masonry-layout";
import InfiniteScroll from "infinite-scroll";

InfiniteScroll.imagesLoaded = imagesLoaded;

import lightbox from "./lightbox";

const gallery = document.querySelector(".gallery");

// Initialize masonry grid
let msnry = new Masonry(gallery, {
    itemSelector: "none",
    columnWidth: ".gallery-sizer",
    percentPosition: true,
    gutter: 22,
    visibleStyle: { transform: "translateY(0)", opacity: 1 },
    hiddenStyle: { transform: "translateY(100px)", opacity: 0 },
});

// Load images
imagesLoaded(gallery, () => {
    msnry.options.itemSelector = ".gallery-item";
    let items = gallery.querySelectorAll(".gallery-item");
    msnry.appended(items);
});

// Initialize infinite scroll
let infScroll = new InfiniteScroll(gallery, {
    path: "?page={{#}}",
    append: ".gallery-item",
    outlayer: msnry,
    history: false,
});

// Refresh lightgallery after new page is loaded
infScroll.on("append", (body, path, items, response) => {
    lightbox.refresh();
});
