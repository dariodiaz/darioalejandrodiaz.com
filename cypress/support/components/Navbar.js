class Navbar {
    visitAboutMe() {
        cy.get('#menu-item-26 > a').click()
    }

    visitEmploymentHistory() {
        cy.get('#menu-item-32 > a').click()
    }

    visitContactMe() {
        cy.get('#menu-item-33 > a').click() 
    }
}
// TODO: 1. create Homepage and link it to this component
// TODO: 2. Refactor the selectors, they are too brittle
export default Navbar