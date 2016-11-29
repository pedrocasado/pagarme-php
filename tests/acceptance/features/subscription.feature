Feature: Subscription
 Como cliente da Pagar.me integrando uma aplicação PHP
 Eu quero uma camada de abstração
 Para que eu possa realizar assinaturas

  Scenario: Create a subscription
    Given a valid customer
    And a valid plan
    And a valid card
    When make a credit card subscription
    Then a subscription must be created
    And the payment method must be 'credit_card'

  Scenario: Create a boleto subscription
    Given a valid customer
    And a valid plan
    When make a boleto subscription
    Then a subscription must be created
    And the payment method must be 'boleto'

 Scenario: Get a subscription
    Given a previous created subscription
    When I query for the subscription
    Then the same subscription must be returned
