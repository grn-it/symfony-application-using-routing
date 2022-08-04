# Symfony Application Using Routing

Sample of how to use routing in a Symfony web application.  

The main meaning of these sample is in the configuration and routing settings, and not in the business logic, so the actions in the controllers have pseudo-code as comments.  

The API describes features of a product catalog in an online store.  

List of entities that are used in this API:
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
 ---------------------------------- -------- -------- ------ ----------------------------------------- 
  Name                               Method   Scheme   Host   Path                                     
 ---------------------------------- -------- -------- ------ ----------------------------------------- 
  _preview_error                     ANY      ANY      ANY    /_error/{code}.{_format}                 
  catalog_categories_list            GET      ANY      ANY    /catalog/categories/                     
  catalog_categories_item            GET      ANY      ANY    /catalog/categories/{uuid}               
  catalog_categories_add             POST     ANY      ANY    /catalog/categories/                     
  catalog_categories_edit            PUT      ANY      ANY    /catalog/categories/{uuid}               
  catalog_categories_delete          DELETE   ANY      ANY    /catalog/categories/{uuid}               
  catalog_categories_products_list   GET      ANY      ANY    /catalog/categories/{category}/products  
  catalog_products_list              GET      ANY      ANY    /catalog/products/                       
  catalog_products_item              GET      ANY      ANY    /catalog/products/{uuid}                 
  catalog_products_add               POST     ANY      ANY    /catalog/products/                       
  catalog_products_edit              PUT      ANY      ANY    /catalog/products/{uuid}                 
  catalog_products_delete            DELETE   ANY      ANY    /catalog/products/{uuid}                 
  catalog_products_search            GET      ANY      ANY    /catalog/products/                       
  catalog_products_reviews_list      GET      ANY      ANY    /catalog/products/{uuid}/reviews         
  catalog_reviews_list               GET      ANY      ANY    /catalog/reviews/                        
  catalog_reviews_item               GET      ANY      ANY    /catalog/reviews/{uuid}                  
  catalog_reviews_add                POST     ANY      ANY    /catalog/reviews/                        
  catalog_reviews_edit               PUT      ANY      ANY    /catalog/reviews/{uuid}                  
  catalog_reviews_delete             DELETE   ANY      ANY    /catalog/reviews/{uuid}                  
 ---------------------------------- -------- -------- ------ -----------------------------------------
```

## Category Controller
```php
// src/Controller/Catalog/CategoryController.php

#[Route('/categories', name: 'categories_')]
class CategoryController extends AbstractController
{
    /**
     * Return list of categories
     */
    #[Route(
        '/',
        'list',
        methods: ['GET']
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
        'item',
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
        'add',
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
        'edit',
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
        'delete',
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

    /**
     * Return list of products in specified category
     */
    #[Route(
        '/{category}/products',
        'products_list',
        requirements: ['category' => '.+'],
        methods: ['GET']
    )]
    public function products(): JsonResponse
    {
        // make request to Category repository for products
        // if products list is empty return empty array
        // return HTTP 200 (OK)

        return $this->json([]);
    }
}
```

Will match these paths:
```
GET /catalog/categories
GET /catalog/categories/7ea27a43-b587-4baa-83c1-aa4ee52db2a1
POST /catalog/categories
PUT /catalog/categories/16793782-d36c-4b6a-97d4-2e6c1fba8782
DELETE /catalog/categories/2a54a70a-0765-4d0d-99b3-b57a30d3ed67
GET /catalog/categories/jeans/products
/catalog/categories/jeans
```
