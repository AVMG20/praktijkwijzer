<?php

namespace Controllers;

use Classes\Controller;
use Classes\Redirect;
use Models\ComplaintModel;

class ComplaintsController extends Controller
{

    /**
     *
     */
    public static function index()
    {
        $complaint = new ComplaintModel();

        return self::view('complaint/index', $complaint->all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return self::view('complaint/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $complaint = new ComplaintModel();

//      check if everything is set and not empty
        foreach ($_POST as $item) {
            if (!isset($item) || empty($item)) return Redirect::send('complaint-create' , ['danger' => 'Please fill in all inputs']);
        }

        $complaint->create([
            "name" => $_POST['name'],
            "amount" => $_POST['amount'],
            "price" => $_POST['price'],
        ]);

        return Redirect::send('complaint', ["success" => "Test item created!"]);
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
        $complaint = new ComplaintModel();

        if (!isset($_GET['id']) && !empty($_GET['id'])) {
            Redirect::send('complaint', ["danger" => "Invalid ID"]);
            return false;
        }

        return self::view('complaint/edit', [
            "id" => $_GET["id"],
            "product" => $complaint->find($_GET['id'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        if (!isset($_POST['id']) && !empty($_POST['id'])) {
            return Redirect::send("complaint", ["danger" => "Invalid ID"]);
        }

        $complaint = new ComplaintModel();

        $complaint->update($_POST['id'], [
            "name" => $_POST['name'],
            "amount" => $_POST['amount'],
            "price" => $_POST['price'],
        ]);

        return Redirect::send("complaint", ["success" => "Edit successful"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        if (!isset($_GET['id']) && !empty($_GET['id'])) return Redirect::send("complaint", ["danger" => "Invalid ID"]);

        $complaint = new ComplaintModel();
        $complaint->destroy($_GET["id"]);

        return Redirect::send("complaint", ["success" => "Item removed!"]);
    }


    /**
     * Solve the current complaint.
     */
    public function solve()
    {
        if (!isset($_GET['id']) && !empty($_GET['id'])) return Redirect::send("complaint", ["danger" => "Invalid ID"]);

        $complaint = new ComplaintModel();
        $complaint->update($_GET["id"] , [
            "solved" => true
        ]);

        return Redirect::send("complaint", ["success" => "Item solved!"]);
    }
}