# Symfony Application Using Routing

Sample of how to use routing in a Symfony web application.  

The main meaning of these sample is in the configuration and routing settings, and not in the business logic, so the actions in the controllers have pseudo-code as comments.  

The API describes features of a product catalog in an online store.  

List of entities that are used in this API:
- Catalog
- Category
- Product
- Review

Entities don't really exist, only controllers and actions are designed.

The routing configuration for the controllers:  
```yaml
# /config/routes.yaml
controllers:
    resource: ../src/Controller/Catalog
    type: attribute
    prefix: '/catalog'
    name_prefix: 'catalog_'
    trailing_slash_on_root: false
```

This means that the routes for all controllers in the `src/Controller/Catalog` directory will be prefixed with `/catalog`, so this prefix can be omitted in the controllers.  
The `/catalog` prefix is needed to separate the catalog section with products from other sections of the site such as `/blog`, `/news`, `/docs`, `/contacts`, `/about-us`.  

List of available routes:
```bash
symfony console debug:router
```
```bash
 -------------------------------- -------- -------- ------ ------------------------------ 
  Name                             Method   Scheme   Host   Path                          
 -------------------------------- -------- -------- ------ ------------------------------ 
  catalog_categories_list          GET      ANY      ANY    /catalog/categories/          
  catalog_products_list            GET      ANY      ANY    /catalog/products/            
  catalog_reviews_list             GET      ANY      ANY    /catalog/reviews/             
  _preview_error                   ANY      ANY      ANY    /_error/{code}.{_format}      
  catalog_category_products_list   GET      ANY      ANY    /catalog/{category}/products  
  catalog_categories_item          GET      ANY      ANY    /catalog/categories/{uuid}    
  catalog_categories_add           POST     ANY      ANY    /catalog/categories/          
  catalog_categories_edit          PUT      ANY      ANY    /catalog/categories/{uuid}    
  catalog_categories_delete        DELETE   ANY      ANY    /catalog/categories/{uuid}    
  catalog_products_search          GET      ANY      ANY    /catalog/products/            
  catalog_products_item            GET      ANY      ANY    /catalog/products/{uuid}      
  catalog_products_add             POST     ANY      ANY    /catalog/products/            
  catalog_products_edit            PUT      ANY      ANY    /catalog/products/{uuid}      
  catalog_products_delete          DELETE   ANY      ANY    /catalog/products/{uuid}      
  catalog_reviews_item             GET      ANY      ANY    /catalog/reviews/{uuid}       
  catalog_reviews_add              POST     ANY      ANY    /catalog/reviews/             
  catalog_reviews_edit             PUT      ANY      ANY    /catalog/reviews/{uuid}       
  catalog_reviews_delete           DELETE   ANY      ANY    /catalog/reviews/{uuid}       
 -------------------------------- -------- -------- ------ ------------------------------
```

## Catalog Controller
```php
// src/Controller/Catalog/CatalogController.php

class CatalogController extends AbstractController
{
    /**
     * Return list of products by category
     */
    #[Route(
        '/{category}/products',
        'category_products_list',
        requirements: ['category' => '.+'],
        methods: ['GET']
    )]
    public function list(string $category): JsonResponse
    {
        // make find request to Product repository by category
        // if there are no products then empty array will be return
        // return HTTP 200 (OK)
        
        return $this->json([]);
    }
}
```

Will match these paths:
```
/catalog/jeans/products
/catalog/shorts/products
/catalog/shoes/products
```
Returns a list of products in the specified category.

## Category Controller
```php
// src/Controller/Catalog/CategoryController.php

#[Route('/categories')]
class CategoryController extends AbstractController
{
    /**
     * Return list of categories
     */
    #[Route(
        '/',
        'categories_list',
        methods: ['GET'],
        priority: 1
    )]
    public function list(): JsonResponse
    {
        // make request to Category repository
        // if categories is empty return empty array
        // return HTTP 200 (OK)
        
        return $this->json([]);
    }

    /**
     * Return single Category
     */
    #[Route(
        '/{uuid}',
        'categories_item',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['GET']
    )]
    public function item(string $uuid): JsonResponse
    {
        // make find request to Category repository
        // if category not found return HTTP 404 (Not Found)
        // return HTTP 200 (OK)
        
        return $this->json([]);
    }

    /**
     * Add new Category
     */
    #[Route(
        '/',
        'categories_add',
        methods: ['POST'],
        condition: "service('app.routing.condition.checker').isRequestBodyNotEmpty(request)"
    )]
    public function add(Request $request): JsonResponse
    {
        // deserialize data from Request to Category object
        // validate Category object data (if validation fail return error message with status HTTP 400 (Bad Request))
        // persist to database
        // return HTTP 201 (Created)
        
        return $this->json([]);
    }

    /**
     * Edit Category
     */
    #[Route(
        '/{uuid}',
        'categories_edit',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['PUT'],
        condition: "service('app.routing.condition.checker').isRequestBodyNotEmpty(request)"
    )]
    public function edit(string $uuid, Request $request): JsonResponse
    {
        // make find request to Category repository
        // if category not found return HTTP 404 (Not Found)
        // deserialize data from Request and populate to exist Category object
        // validate Category object data (if validation fail return error message with status HTTP 400 (Bad Request))
        // persist edited Category object to database
        // return HTTP 200 (OK)
        
        return $this->json([]);
    }

    /**
     * Delete Category
     */
    #[Route(
        '/{uuid}',
        'categories_delete',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['DELETE']
    )]
    public function delete(string $uuid): JsonResponse
    {
        // make find request to Category repository
        // if category not found return HTTP 404 (Not Found)
        // delete Category from database
        // return HTTP 200 (OK)
        
        return $this->json([]);
    }
}
```

Will match these paths:
```
/catalog/categories
/catalog/categories/
```
