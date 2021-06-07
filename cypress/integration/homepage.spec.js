import Navbar from "../support/components/Navbar";

describe('Homepage tests', () => {
    const navbar = new Navbar()
    beforeEach(() => {
        cy.visit(Cypress.env('host'))
        cy.viewport('macbook-15')
    })

    it('Should load homepage and verify title', () => {
        cy.title()
            .should('eq', 'Hi! I\'m Dario Diaz - QA Engineer')
    })

    it('Should validate about me link', () => {
        navbar.visitAboutMe()
        cy.location('pathname')
            .should('eq', '/about-me/')
        cy.get('.post-title')
            .should('have.text', 'About Me ')
    })

    it('Should validate employment history link', () => {
        navbar.visitEmploymentHistory()
        cy.location('pathname')
            .should('eq', '/employment-history/')
        cy.get('.post-title')
            .should('have.text', 'Employment History ')
    })

    it('Should validate contact me link', () => {
        navbar.visitContactMe()
        cy.location('pathname')
            .should('eq', '/contact-me/')
        cy.get('.post-title')
            .should('have.text', 'Contact Me ')
    })
})