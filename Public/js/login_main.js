/**
 * Created by sura on 2015/4/20 0020.
 */
require.config({
    paths: {
        "jquery":"jquery"
    },
    shim: {
        "placeholder": ["jquery"]
    }
})

require(["placeholder"]);