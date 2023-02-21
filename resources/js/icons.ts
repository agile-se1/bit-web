import {library} from '@fortawesome/fontawesome-svg-core';
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";


// Icon Imports
import {
    faArrowLeft,
    faCircleInfo,
    faPaperPlane,
    faPenToSquare,
    faRightFromBracket,
    faTrash,
    faUpload,
    faUserPlus,
    faXmark,
} from "@fortawesome/free-solid-svg-icons";

// Add Icons to Library
library.add(
    faCircleInfo,
    faPenToSquare,
    faTrash,
    faPaperPlane,
    faUserPlus,
    faXmark,
    faArrowLeft,
    faRightFromBracket,
    faUpload
);


export default FontAwesomeIcon;
