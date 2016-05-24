Feature: Hungry user starts the order
  In order to have a dish
  As hungry user
  I should be able to select caterer and starts order from him

  Scenario: Order starting by hungry user
    Given there are following caterers:
      | name   |
  	  | Saluto |
      | Korova |
    When I start order for "Korova" caterer
    Then new order for "Korova" caterer should be open
    And I should become order keeper of "Korova" order
