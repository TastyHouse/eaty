Feature: Hungry User selects the Dish
  In order to select a Dish
  As Hungry User
  I should be able to view available Dishes in Menu of Caterer

  Scenario: Hungry User selects from Internal Menu
    Given selected Caterer has Internal Menu
    And there is at least one Dish in it
    When I try to select a Dish from Internal Menu
    Then I should have that Dish selected as mine

  Scenario: Hungry User selects from External Menu
    Given selected Caterer has External Menu
    When I try to input selected Dish manually
    And I provided name and price of that Dish
    Then I should have that Dish selected as mine

  Scenario: Hungry User wants to change other Hungry User Dish
    Given selected Dish does not belong to me
    When I try to change that Dish
    Then I should not succeed
    And see info message informing why
