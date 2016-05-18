Feature: Administrator adds the Caterer
  In order to have a new Caterer available to be selected by Hungry Users
  As Administrator
  I should be able to input Caterer data (name, contact)

  Scenario: Caterer being added provides Administrator the Menu
    Given Caterer being added has Menu that he can provide
    And there is at least one Dish in it
    When I am adding that Caterer
    Then I should be able to input his Menu to app as Internal Menu
    And Internal Menu should be visible for Hungry Users

  Scenario: Caterer being added does not provide Administrator the Menu
    Given Caterer being added cannot provide the Menu
    And Caterer provides information about available Dishes somewhere over the Internet
    When I am adding that Caterer
    Then I should be able to input link to his Menu as External Menu
    And External Menu link should be visible for Hungry Users