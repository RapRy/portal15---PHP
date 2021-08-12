module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    fontFamily: {
      poppins: ["Poppins", "sans-serif"],
    },
    boxShadow: {
      shadowRight: "1px 0px 4px 0px rgba(0,0,0,.05)",
      cardShadow: "1px 3px 4px 0px rgba(0,0,0,.05)",
    },
    extend: {
      colors: {
        primaryMain: "#FFCE1F",
        primaryLight: "#FFDF6B",
        primaryDark: "#F9C200",
        secondaryMain: "#D6FF62",
        secondaryDark: "#71B650",
        neutralLight: "#fff",
        neutralMain: "#FAFAFA",
        neutralDark: "#DFDFDF",
        textColor1: "#1F1F1F",
        textColor2: "#575757",
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
