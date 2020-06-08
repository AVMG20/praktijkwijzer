<?php

namespace Controllers;

use Classes\Controller;
use Classes\Redirect;
use Models\ExampleModel;

class ExampleController extends Controller
{

    /**
     *
     */
    public static function index()
    {
        $test = new ExampleModel();

        return self::view('example/index', $test->all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return self::view('example/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $exampleModel = new ExampleModel();

//      check if everything is set and not empty
        foreach ($_POST as $item) {
            if (!isset($item) || empty($item)) return Redirect::send('example-create' , ['danger' => 'Please fill in all inputs']);
        }

        $exampleModel->create([
            "name" => $_POST['name'],
            "amount" => $_POST['amount'],
            "price" => $_POST['price'],
        ]);

        return Redirect::send('example', ["success" => "Test item created!"]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $exampleModel = new ExampleModel();

        if (!isset($_GET['id']) && !empty($_GET['id'])) {
            Redirect::send('example', ["danger" => "Invalid ID"]);
            return false;
        }

        return self::view('example/edit', [
            "id" => $_GET["id"],
            "product" => $exampleModel->find($_GET['id'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        if (!isset($_POST['id']) && !empty($_POST['id'])) {
            return Redirect::send("example", ["danger" => "Invalid ID"]);
        }

        $exampleModel = new ExampleModel();

        $exampleModel->update($_POST['id'], [
            "name" => $_POST['name'],
            "amount" => $_POST['amount'],
            "price" => $_POST['price'],
        ]);

        return Redirect::send("example", ["success" => "Edit successful"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        if (!isset($_GET['id']) && !empty($_GET['id'])) return Redirect::send("example", ["danger" => "Invalid ID"]);

        $exampleModel = new ExampleModel();
        $exampleModel->destroy($_GET["id"]);

        return Redirect::send("example", ["success" => "Item removed!"]);
    }
}