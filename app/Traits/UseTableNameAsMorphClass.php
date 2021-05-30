<?php

trait UseTableNameAsMorphClass
{
    public function getMorphClass(): string
    {
        return $this->getTable();
    }
}
