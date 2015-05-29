/**
 * Created by sura on 2015/4/19 0019.
 */
require.config({
    paths : {
        "jquery":"jquery"
    },
    shim: {
        "banner":  ["jquery"],
        "carousel":  ["jquery"],
        "tagbox": ["jquery"]
    }
})

require(["tagbox", "banner", "carousel"])