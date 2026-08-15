<?php

if (!defined('TAXIYATRI')) {
    exit('Direct access not allowed');
}


function redirectHome()
{
    header("Location: https://www.taxiyatri.com/", true, 301);
    exit;
}

function show404()
{
    http_response_code(404);
    require __DIR__ . '/../404.php';
    exit;
}

function esc($value)
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

/*
|--------------------------------------------------------------------------
| Cities
|--------------------------------------------------------------------------
*/

function getCityBySlug($slug)
{
    global $pdo;

    try {

        $stmt = $pdo->prepare("
            SELECT *
            FROM cities
            WHERE slug = ?
            LIMIT 1
        ");

        $stmt->execute([$slug]);

        return $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        error_log($e->getMessage());

         redirectHome();

    }
}

function getCityById($id)
{
    global $pdo;

    $stmt = $pdo->prepare("
        SELECT *
        FROM cities
        WHERE id = ?
        LIMIT 1
    ");

    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getAllCities()
{
    global $pdo;

    try {

        $stmt = $pdo->query("
            SELECT *
            FROM cities
            ORDER BY name
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        error_log($e->getMessage());

        return [];

    }
}

/*
|--------------------------------------------------------------------------
| Areas
|--------------------------------------------------------------------------
*/

function getAreas($cityId)
{
    global $pdo;

    try {

        $stmt = $pdo->prepare("
            SELECT *
            FROM areas
            WHERE city_id = ?
            ORDER BY location_name
        ");

        $stmt->execute([$cityId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        error_log($e->getMessage());

        return [];

    }
}
function getAreaBySlug($cityId, $slug)
{
    global $pdo;

    try {

        $stmt = $pdo->prepare("
            SELECT *
            FROM areas
            WHERE city_id = ?
            AND slug = ?
            LIMIT 1
        ");

        $stmt->execute([$cityId, $slug]);

        return $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        error_log($e->getMessage());

        return null;

    }
}
/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
*/

function getRoute($fromSlug, $toSlug)
{
    global $pdo;

    try {

        $stmt = $pdo->prepare("
            SELECT
                r.*,
                fc.name AS from_city,
                fc.slug AS from_slug,
                tc.name AS to_city,
                tc.slug AS to_slug

            FROM routes r

            JOIN cities fc
                ON fc.id = r.from_city_id

            JOIN cities tc
                ON tc.id = r.to_city_id

            WHERE fc.slug = ?
            AND tc.slug = ?

            LIMIT 1
        ");

        $stmt->execute([$fromSlug, $toSlug]);

        return $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        error_log($e->getMessage());

        return null;

    }
}

function getRoutesFromCity($cityId)
{
    global $pdo;

    try {

        $stmt = $pdo->prepare("
            SELECT
                r.*,
                c.name,
                c.slug

            FROM routes r

            JOIN cities c
                ON c.id = r.to_city_id

            WHERE r.from_city_id = ?

            ORDER BY c.name
        ");

        $stmt->execute([$cityId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        error_log($e->getMessage());

        return [];

    }
}

/*
|--------------------------------------------------------------------------
| Pricing
|--------------------------------------------------------------------------
*/

function getPricing()
{
    global $pdo;

    try {

        $stmt = $pdo->prepare("
            SELECT *
            FROM pricing
            ORDER BY id
        ");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        error_log($e->getMessage());

         redirectHome();

    }
}

/*
|--------------------------------------------------------------------------
| FAQs
|--------------------------------------------------------------------------
*/

function getFaqs($city)
{
    global $pdo;

    try {

        // Load template FAQs
        $templates = require __DIR__ . '/faq_templates.php';

        $replacements = [

            '{CITY}'         => $city['name'],
            '{STATE}'        => $city['state'],
            '{AIRPORT}'      => $city['airport_name'],
            '{AIRPORT_CODE}' => $city['airport_code'],
            '{RAILWAY}'      => $city['railway_station_name']

        ];

        foreach ($templates as &$faq) {

            $faq['question'] = str_replace(
                array_keys($replacements),
                array_values($replacements),
                $faq['question']
            );

            $faq['answer'] = str_replace(
                array_keys($replacements),
                array_values($replacements),
                $faq['answer']
            );
        }

        // Load custom FAQs from database
        $stmt = $pdo->prepare("
            SELECT question, answer
            FROM faqs
            WHERE city_id = ?
            ORDER BY id
        ");

        $stmt->execute([$city['id']]);

        $customFaqs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Merge both arrays
        return array_merge($templates, $customFaqs);

    } catch (Throwable $e) {

        error_log($e->getMessage());

        return [];

    }
}

/*
|--------------------------------------------------------------------------
| Travel Tips
|--------------------------------------------------------------------------
*/

function getTravelTips($cityId)
{
    global $pdo;

    try {

        $stmt = $pdo->prepare("
            SELECT *
            FROM travel_tips
            WHERE city_id = ?
            ORDER BY id
        ");

        $stmt->execute([$cityId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        error_log($e->getMessage());

        return [];

    }
}

function getCityFacts($cityId)
{
    global $pdo;

    try {

        $stmt = $pdo->prepare("
            SELECT *
            FROM city_facts
            WHERE city_id = ?
            LIMIT 1
        ");

        $stmt->execute([$cityId]);

        return $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        error_log($e->getMessage());

        return [];

    }
}
