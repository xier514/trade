/**
 * Created by sura on 2015/4/23 0023.
 */
require.config({
    paths : {
        "jquery":"jquery"
    },
    shim: {
        "reg_placeholder":  ["jquery"]
    }
})

require(["reg_placeholder"])