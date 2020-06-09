<?php

use App\AttributeGroup;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('attribute_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedSmallInteger('position')->unique();
            $table->unsignedTinyInteger('type')->default(AttributeGroup::DROPDOWN_ATTRIBUTE);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attribute_groups');
    }
}
