# Sylius Cost Price Plugin

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-travis]][link-travis]
[![Quality Score][ico-code-quality]][link-code-quality]

Add a cost price property to your products.

## Installation

### Step 1: Download the plugin

Open a command console, enter your project directory and execute the following command to download the latest stable version of this bundle:

```bash
$ composer require setono/sylius-costprice-plugin
```

This command requires you to have Composer installed globally, as explained in the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the Composer documentation.


### Step 2: Enable the plugin

Then, enable the plugin by adding it to the list of registered plugins/bundles
in the `config/bundles.php` file of your project:

```php
<?php
// config/bundles.php

return [
    // ...
    
    Setono\SyliusCostPricePlugin\SetonoSyliusCostPricePlugin::class => ['all' => true],
    
    // ...
];

```

### Step 3: Configure the plugin

In `config/doctrine/Product.orm.xml`:
```xml
<?xml version="1.0" encoding="UTF-8"?>

<doctrine-mapping xmlns="http://doctrine-project.org/schemas/orm/doctrine-mapping"
                  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                  xsi:schemaLocation="http://doctrine-project.org/schemas/orm/doctrine-mapping
                                      http://doctrine-project.org/schemas/orm/doctrine-mapping.xsd">

    <mapped-superclass name="App\Model\ProductVariant" table="sylius_product_variant">
        <field name="costPriceCurrency" column="cost_price_currency" />
        <field name="costPrice" column="cost_price" type="integer" />
    </mapped-superclass>

</doctrine-mapping>
```

### Step 4: Import product variant trait

```php
<?php
// src/Model/ProductVariant.php

declare(strict_types=1);

namespace App\Model;

use Setono\SyliusCostPricePlugin\Model\CostPriceAwareInterface;
use Setono\SyliusCostPricePlugin\Model\ProductVariantTrait;
use Sylius\Component\Core\Model\Product as BaseProduct;

class ProductVariant extends BaseProduct implements CostPriceAwareInterface
{
    use ProductVariantTrait;
    
    // ...
}
```

**NOTE:** If you haven't extended the `ProductVariant` entity yet, follow the [customization instructions](https://docs.sylius.com/en/1.2/customization/model.html) first because you need to add a bit more configuration.

### Step 5: Update your database schema
```bash
$ php bin/console doctrine:schema:update --force
```

or use [Doctrine Migrations](https://symfony.com/doc/master/bundles/DoctrineMigrationsBundle/index.html):

```bash
$ php bin/console doctrine:migrations:diff
$ php bin/console doctrine:migrations:migrate
```

### Step 6: Add form widgets to twig templates
You need to override the template displaying the product and product variant form and add a `form_row` statement with the cost price and cost price currency:

```twig
{# app/Resources/SyliusAdminBundle/views/ProductVariant/Tab/_details.html.twig #}

{# ... #}

<div class="ui segment">
    {{ form_row(form.code) }}
    <div class="two fields">
        {{ form_row(form.shippingCategory) }}
    </div>
    {# This is the part you should add #}
    <div class="four fields">
        {{ form_row(form.costPriceCurrency) }}
        {{ form_row(form.costPrice) }}
    </div>
    {# End of the part you should add #}
    {{ form_row(form.channelPricings) }}
</div>

{# ... #}
```

```twig
{# app/Resources/SyliusAdminBundle/views/Product/Tab/_details.html.twig #}

<div class="ui segment">
    {{ form_row(form.code) }}
    {{ form_row(form.enabled) }}
    {% if product.simple %}
        {{ form_row(form.variant.onHand) }}
        {{ form_row(form.variant.tracked) }}
        {{ form_row(form.variant.shippingRequired) }}
        {{ form_row(form.variant.version) }}
    {% else %}
        {{ form_row(form.options) }}
        {{ form_row(form.variantSelectionMethod) }}
    {% endif %}

    {# Nothing to see here. #}
    <div class="ui hidden element">
        {# This is the part you should add #}
        <div class="two fields">
            {{ form_row(form.variant.costPriceCurrency) }}
            {{ form_row(form.variant.costPrice) }}
        </div>
        {# End of the part you should add #}
    
        {% if product.simple %}
            {{ form_row(form.variant.translations) }}
        {% endif %}
        {{ form_row(form.variantSelectionMethod) }}
    </div>
</div>
```

If you haven't overridden the template yet, you can just copy the templates from `vendor/setono/sylius-cost-price-plugin/src/Resources/views/SyliusAdminBundle` to `app/Resources/SyliusAdminBundle/views/`

