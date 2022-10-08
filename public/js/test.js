<? php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contact extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema:: create('contact', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('contactName');
            $table -> string('contactEmail');
            $table -> string('contactNumber');
            $table -> string('subject');
            $table -> integer('quantity');
            $table -> dateTime('created_at');
            $table -> dateTime('updated_at');
            $table -> unsignedBigInteger('products_id');
            $table -> foreign('products_id') -> references('id') -> on('products');
            $table -> integer('notification');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }
}
