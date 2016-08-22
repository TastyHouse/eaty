Feature: Hungry User selects the Dish
  In order to select a Dish
  As Hungry User
  I should be able to view available Dishes in Menu of Caterer

  @InternalWish
  Scenario: Hungry User wants to add Special Wish to dish
    Given Open Order for "Korova" Caterer exists
    When I add "VodkaBurger" as name and "28 zł" as price of a dish and "bezalkoholowa" as Special Wish
    Then I should have "VodkaBurger" for "28 zł" with "bezalkoholowa" as mine in order