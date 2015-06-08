require.config({
    paths : {
        "jquery":"jquery"
    },
    shim: {
        "info_placeholder":  ["jquery"]
    }
})

require(["info_placeholder"])