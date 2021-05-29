/// <reference types="Cypress" />
describe('Homepage tests', () => {
    it('Should load homepage and verify title', () => {
        cy.visit(Cypress.env('baseURL_production')).title().should('eq', 'Hi! I\'m Dario Diaz - QA Engineer')
    });
});