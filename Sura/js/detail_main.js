/**
 * Created by sura on 2015/4/21 0021.
 */
require.config({
    paths : {
        "jquery":"jquery"
    },
    shim: {
        "sort_box":  ["jquery"]
    }
})

require(["sort_box"])