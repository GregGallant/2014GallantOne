var GallantHeader = React.createClass({displayName: "GallantHeader",

    render: function() {
        return(
                React.createElement("div", null, 
                React.createElement("div", {className: "goHeader"}, 
                    React.createElement("a", {href: "/"}, React.createElement("img", {id: "goLogo", alt: "GallantOne.com", border: "0", src: "/images/one/one_logo.png"}))
                ), 
                React.createElement("div", {className: "goLine"}), 
                React.createElement("div", {className: "authMenu"}, 
                    React.createElement("div", {className: "loginPlacement"}, React.createElement("a", {className: "loginPlacement", href: "/login"}, "login"), " / ", React.createElement("a", {className: "loginPlacement", href: "/register"}, "register"))
                )
                )
        ); 
    }

});
