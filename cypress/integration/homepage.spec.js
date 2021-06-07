// /// <reference types="Cypress" />
describe('Homepage tests', () => {
    beforeEach(() => {
        cy.visit(Cypress.env('host'))
        cy.viewport('macbook-15')
    });
    it('Should load homepage and verify title', () => {
        cy.title().should('eq', 'Hi! I\'m Dario Diaz - QA Engineer')
    })

    it('Should validate about me link', () => {
        cy.get('#menu-item-26 > a').click()
        cy.location('pathname').should('eq', '/about-me/')
        cy.get('.post-title').should('have.text', 'About Me ')
    })

    it('Should validate employment history link', () => {
        cy.get('#menu-item-32 > a').click()
        cy.location('pathname').should('eq', '/employment-history/')
        cy.get('.post-title').should('have.text', 'Employment History ')
    })

    it('Should validate contact me link', () => {
        cy.get('#menu-item-33 > a').click()
        cy.location('pathname').should('eq', '/contact-me/')
        cy.get('.post-title').should('have.text', 'Contact Me ')
    })
})