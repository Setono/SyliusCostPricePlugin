@managing_product_cost_price
Feature: Adding a new product with a cost price
  In order to extend my merchandise
  As an Administrator
  I want to add a new product to the shop with a given cost price and cost price currency

  Background:
    Given the store operates on a single channel in "United States"
    And the store has "Standard" shipping category
    And I am logged in as an administrator

  @ui
  Scenario: Adding a new simple product with cost price and cost price currency
    Given I want to create a new simple product
    When I specify its code as "BOARD_DICE_BREWING"
    And I name it "Dice Brewing" in "English (United States)"
    And I set its slug to "dice-brewing" in "English (United States)"
    And I set its price to "$10.00" for "United States" channel
    And I set its cost price to "10.92"
    And I set its cost price currency to "USD"
    And I add it
    Then I should be notified that it has been successfully created
    And the product "Dice Brewing" should appear in the store

  @ui
  Scenario: Adding a new simple product with cost price and cost price currency
    Given I want to create a new simple product
    When I specify its code as "BOARD_FISH_BREWING"
    And I name it "Fish Brewing" in "English (United States)"
    And I set its slug to "fish-brewing" in "English (United States)"
    And I set its price to "$10.00" for "United States" channel
    And I set its cost price to ""
    And I set its cost price currency to "USD"
    And I add it
    Then I should be notified that it has been successfully created
    And the product "Fish Brewing" should appear in the store
