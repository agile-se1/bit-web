import {library} from '@fortawesome/fontawesome-svg-core';
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";


// Icon Imports
import {faCircleInfo, faPaperPlane, faPenToSquare, faTrash,} from "@fortawesome/free-solid-svg-icons";

// Add Icons to Library
library.add(
    faCircleInfo,
    faPenToSquare,
    faTrash,
    faPaperPlane
);


export default FontAwesomeIcon;
