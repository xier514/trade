require.config({
    paths : {
        "jquery":"jquery"
    },
    shim: {
        "revise_placeholder":  ["jquery"]
    }
})

require(["revise_placeholder"])
